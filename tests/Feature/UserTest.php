<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Mail;
use App\Mail\NewPasswordMail;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Unauthorized User Page Test
     * @group Users
     */

    public function test_unauthorized_user_cannot_access_users_page()
    {
        $response = $this->get('/users');
        $response->assertRedirect('/login');
    }

    /**
     * User Page Test
     * @group Users
     */

    public function test_authorized_user_can_access_user_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->get('/users');
        $response->assertStatus(200);
    }

    /**
     * Show User Page
     * @group Users
     */

    public function test_authorized_user_can_see_show_user_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->get('/users/' . $user->id);
        $response->assertStatus(200);
    }

    /**
     * User List Test
     * @group Users
     */

    public function test_authorized_user_see_user_list()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'api');
        $response = $this->json('POST', '/api/user-list', $this->paginateData());
        $response->assertStatus(200);
    }

    /**
     * Add User Test
     * @group Users
     */

    public function test_authorized_user_can_add_user()
    {
        Mail::fake();
        $postData = $this->postData();
        $user = User::find(1);
        $response = $this->actingAs($user, 'api');
        $response = $this->json('POST', '/api/user', $postData);
        $response->assertStatus(200);
        // $password = str_random(6);
        // Mail::assertQueued(NewPasswordMail::class, function ($mail) use ($user, $password) {
        //     return $mail->user->id === $user->id;
        // });
    }

    /**
     * Update User Test
     * @group Users
     */

    public function test_authorized_user_can_update_user()
    {
        $postData = $this->postData();
        $user = User::find(1);
        $editUser = User::find(1);
        $response = $this->actingAs($user, 'api');
        $response = $this->json('PUT', '/api/user/' . $editUser->id, $postData);
        $response->assertStatus(200);
    }

    /**
     * Upload User's Photo Test
     * @group Users
     */

    public function test_authorized_user_can_upload_photo()
    {
        Storage::fake('avatars');
        $photo = UploadedFile::fake()->image('avatar.jpg');
        $user = User::find(1);
        $imageData = [
            'file' => $photo,
            'id' => $user->id,
            'model' => 'user',
        ];
        $response = $this->actingAs($user, 'api');
        $response = $this->json('POST', '/api/media-upload', $imageData);
        $response->assertStatus(200);
    }

    /**
     * Get User By ID Api Test
     * @group Users
     */

    public function test_authorized_user_can_get_user_by_id()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'api');
        $response = $this->json('GET', '/api/user');
        $response->assertStatus(200);
    }

    /**
     * Post Data to create or update Users
     */

    private function postData()
    {
        $faker = Factory::create();
        static $password;
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => $password ?: $password = bcrypt('secret'),
            'phone' => $faker->e164PhoneNumber,
            'remember_token' => str_random(10),
            'is_active' => 0,
        ];
    }

    /**
     * Pagination Data for User List End point
     */

    private function paginateData()
    {
        return [
            'searchQ' => '',
            'paginate' => 10,
        ];
    }
}
