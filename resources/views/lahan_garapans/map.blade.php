<div id="building_map">
  <div class="box box-warning box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Field Map</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="location"
           style="width: 100%; height: 40vh;">
        <gmap-map :center="location"
                  :zoom="12"
                  style="width: 100%; height: 40vh;">
          <gmap-marker :position="location"
                       :clickable="true"
                       :draggable="true"
                       @click="center=location"
                       @place_changed="setPlace"
                       @position_changed="markerDrag($event)"></gmap-marker>
        </gmap-map>
      </div>
    </div>
    <div class="box-footer">
      <div class="row">
        <div class="col-md-12">
          <div class="input-group">
            <gmap-autocomplete @place_changed="setPlace" class="form-control"></gmap-autocomplete>
            <span class="input-group-btn">
              <button class="btn btn-warning" type="button" @click="setLocation">Save Location</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('scripts')
<script>
  const app = new Vue({
    el: '#app',
    data: {
      location: {
        lat: {{ $lahanGarapan->lat ? $lahanGarapan->lat : -6.17511 }},
        lng: {{ $lahanGarapan->lng ? $lahanGarapan->lng : 106.865039 }},
      },
      markers: [
        {
          position: {
            lat: -6.17511,
            lng: 106.865039
          }
        }
      ],
    },
    methods: {
      markerDrag: _.debounce(function(position) {
        this.location.lat = position.lat()
        this.location.lng = position.lng()
      }, 500),
      setPlace(place) {
        this.location.lat = place.geometry.location.lat()
        this.location.lng = place.geometry.location.lng()
      },
      setLocation() {
        axios.put('/lahanGarapans/location/' + {{ $lahanGarapan->id }}, this.location)
          .then(resp => {
            console.log(resp);
            new Noty({
                type: 'success',
                layout: 'topRight',
                timeout: 5000,
                text: resp.data.message
            }).show();
          })
          .catch(e => console.log(e))
      }
    }
  })
</script>
@endsection