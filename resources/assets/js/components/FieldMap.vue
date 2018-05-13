<template>
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

</template>

<script>
export default {
  props: ['lat', 'lng'],
  data: () => ({
    location: {
      lat: 10.0,
      lng: 10.0,
      location: ""
    },
    markers: [
      {
        position: {
          lat: -6.17511,
          lng: 106.865039
        }
      }
    ],
    showModal: false,
    snackbar: false,
    snackTime: 5000
  }),
  mounted() {
    this.setInitLoc();
  },
  methods: {
    setPlace(place) {
      this.location = {
        lat: place.geometry.location.lat(),
        lng: place.geometry.location.lng(),
        location: place.formatted_address
      };
    },
    markerDrag(position) {
      this.location = {
        lat: position.lat(),
        lng: position.lng()
      };
    },
    setLocation() {
      console.log('Submit');
    },
    setInitLoc() {
      this.location.lat = this.lat
      this.location.lng = this.lng
    }
  }
};
</script>
<style type="text/css" scoped>

</style>