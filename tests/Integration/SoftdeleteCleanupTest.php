<?php

namespace Edofre\SoftdeleteCleanup\Test\Integration;

use Illuminate\Support\Facades\Artisan;

/**
 * Class SoftdeleteCleanupTest
 * @package Edofre\SoftdeleteCleanup\Test\Integration
 */
class SoftdeleteCleanupTest extends TestCase
{
    /** @test */
    public function model_saving_sets_deleted_at_to_null()
    {
        $model = TestModel::create(['name' => 'Test model']);
        $model->save();

        $this->assertEquals(null, $model->deleted_at);
    }

    /** @test */
    public function call_command_with_incorrect_model_name()
    {
        Artisan::call('db:softdelete-cleanup', [
            'model_name' => TestModel::class . 'X', // Note the 'X' to make the name incorrect
        ]);

        // If you need result of console output
        $resultAsText = Artisan::output();
        $this->assertEquals("Class not found in system\n", $resultAsText);
    }

    /** @test */
    public function call_command_with_correct_model_name_but_no_deleted_models()
    {
        Artisan::call('db:softdelete-cleanup', [
            'model_name' => TestModel::class,
        ]);

        // If you need result of console output
        $resultAsText = Artisan::output();
        $this->assertEquals("0 items deleted\n", $resultAsText);
    }

    /** @test */
    public function call_command_with_correct_model_name_and_deleted_models()
    {
        $deleted_model = TestModel::create(['name' => 'Test model']);
        $deleted_model->save();
        // Delete the model so we have 1 to actually trash
        $deleted_model->delete();

        Artisan::call('db:softdelete-cleanup', [
            'model_name' => TestModel::class,
        ]);

        // If you need result of console output
        $resultAsText = Artisan::output();
        $this->assertEquals("1 items deleted\n", $resultAsText);
    }

    /** @test */
    public function call_command_with_mixed_deleted_and_not_deleted_models()
    {
        $deleted_model = TestModel::create(['name' => 'Test model']);
        $deleted_model->save();
        // Delete the model so we have 1 to actually trash
        $deleted_model->delete();

        $not_deleted_model = TestModel::create(['name' => 'Another Test model']);
        $not_deleted_model->save();

        $another_deleted_model = TestModel::create(['name' => 'Another Deleted Test model']);
        $another_deleted_model->save();
        // Delete the model so we have 1 to actually trash
        $another_deleted_model->delete();

        Artisan::call('db:softdelete-cleanup', [
            'model_name' => TestModel::class,
        ]);

        // If you need result of console output
        $resultAsText = Artisan::output();
        $this->assertEquals("2 items deleted\n", $resultAsText);
    }
}
