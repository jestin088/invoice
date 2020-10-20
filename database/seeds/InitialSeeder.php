<?php

use App\Constants\Role;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\InventoryLog;
use App\Models\Item;
use App\Models\Owner;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = Hash::make('123456');

        try {
            DB::beginTransaction();

            // Create Admin User
            $adminUser = new User();
            $adminUser->email = 'admin@gmail.com';
            $adminUser->password = $defaultPassword;
            $adminUser->role = Role::ADMIN;
            $adminUser->save();

            // Create Warehouse Owner
            $ownerUser = new User();
            $ownerUser->email = 'owner@gmail.com';
            $ownerUser->password = $defaultPassword;
            $ownerUser->role = Role::OWNER;
            $ownerUser->save();
            $ownerDetails = new Owner();
            $ownerDetails->name = 'Owner';
            $ownerDetails->contact_number = '0812';
            $ownerDetails->country = 'Indonesia';
            $ownerDetails->province = 'DKI Jakarta';
            $ownerDetails->city = 'Jakarta';
            $ownerDetails->address = 'Jl. Sunter Metro Blok F4/44';
            $ownerDetails->postcode = '12345';
            $ownerUser->ownerDetails()->save($ownerDetails);

            // Create Warehouse Customer
            $customer = new User();
            $customer->email = 'customer@gmail.com';
            $customer->password = $defaultPassword;
            $customer->role = Role::CUSTOMER;
            $customer->save();
            $customerDetails = new Customer();
            $customerDetails->name = 'customer';
            $customerDetails->contact_number = '0812';
            $customerDetails->country = 'Indonesia';
            $customerDetails->province = 'DKI Jakarta';
            $customerDetails->city = 'Jakarta';
            $customerDetails->address = 'Jl. Sunter Metro Blok F4/44';
            $customerDetails->postcode = '12345';
            $customer->customerDetails()->save($customerDetails);

            // Create Warehouse
            $warehouse = new Warehouse();
            $warehouse->contact_person = 'Panji';
            $warehouse->contact_number = '123456';
            $warehouse->country = 'Indonesia';
            $warehouse->province = 'DKI Jakarta';
            $warehouse->city = 'Jakarta';
            $warehouse->address = 'Tj. Priok';
            $warehouse->postcode = '12345';
            $warehouse->measurement_unit = 'Km';
            $warehouse->length = 3.2;
            $warehouse->width = 2.1;
            $warehouse->height = 1;
            $warehouse->area = $warehouse->length * $warehouse->width;
            $warehouse->volume = $warehouse->area * $warehouse->height;
            $ownerDetails->warehouses()->save($warehouse);

            // Create Items
            $itemOne = new Item();
            $itemOne->name = 'Baju Biru';
            $itemOne->description = 'Baju berwarna biru';
            $itemOne->notes = 'Barang original';
            $itemOne->user_sku = 'FASHION001';
            $itemOne->admin_sku = 'FASHION001';
            $itemOne->system_sku = $itemOne->admin_sku . '-' . time();
            $customerDetails->items()->save($itemOne);

            $itemTwo = new Item();
            $itemTwo->name = 'Celana Hitam';
            $itemTwo->description = 'Celana berwarna hitam';
            $itemTwo->notes = 'Barang original';
            $itemTwo->user_sku = 'FASHION002';
            $itemTwo->admin_sku = 'FASHION002';
            $itemTwo->system_sku = $itemTwo->admin_sku . '-' . time();
            $customerDetails->items()->save($itemTwo);

            // Create Inventories
            $inventoryOne = new Inventory();
            $inventoryOne->warehouse_id = $warehouse->id;
            $inventoryOne->item_id = $itemOne->id;
            $inventoryOne->initial_quantity = 5;
            $inventoryOne->available_quantity = 5;
            $inventoryOne->save();

            $inventoryTwo = new Inventory();
            $inventoryTwo->warehouse_id = $warehouse->id;
            $inventoryTwo->item_id = $itemOne->id;
            $inventoryTwo->initial_quantity = 7;
            $inventoryTwo->available_quantity = 7;
            $inventoryTwo->save();

            $inventoryThree = new Inventory();
            $inventoryThree->warehouse_id = $warehouse->id;
            $inventoryThree->item_id = $itemTwo->id;
            $inventoryThree->initial_quantity = 3;
            $inventoryThree->available_quantity = 3;
            $inventoryThree->save();

            $inventoryFour = new Inventory();
            $inventoryFour->warehouse_id = $warehouse->id;
            $inventoryFour->item_id = $itemTwo->id;
            $inventoryFour->initial_quantity = 2;
            $inventoryFour->available_quantity = 2;
            $inventoryFour->save();

            // Create Inventory Logs
            $inventoryLogOne = new InventoryLog();
            $inventoryLogOne->user_id = $adminUser->id;
            $inventoryLogOne->quantity_before = 0;
            $inventoryLogOne->quantity_change = $inventoryOne->initial_quantity;
            $inventoryLogOne->quantity_after = $inventoryLogOne->quantity_before + $inventoryLogOne->quantity_change;
            $inventoryLogOne->description = 'Initial stock';
            $inventoryOne->inventoryLogs()->save($inventoryLogOne);

            $inventoryLogTwo = new InventoryLog();
            $inventoryLogTwo->user_id = $adminUser->id;
            $inventoryLogTwo->quantity_before = 0;
            $inventoryLogTwo->quantity_change = $inventoryTwo->initial_quantity;
            $inventoryLogTwo->quantity_after = $inventoryLogTwo->quantity_before + $inventoryLogTwo->quantity_change;
            $inventoryLogTwo->description = 'Initial stock';
            $inventoryTwo->inventoryLogs()->save($inventoryLogTwo);

            $inventoryLogThree = new InventoryLog();
            $inventoryLogThree->user_id = $adminUser->id;
            $inventoryLogThree->quantity_before = 0;
            $inventoryLogThree->quantity_change = $inventoryThree->initial_quantity;
            $inventoryLogThree->quantity_after = $inventoryLogThree->quantity_before + $inventoryLogThree->quantity_change;
            $inventoryLogThree->description = 'Initial stock';
            $inventoryThree->inventoryLogs()->save($inventoryLogThree);
            
            $inventoryLogFour = new InventoryLog();
            $inventoryLogFour->user_id = $adminUser->id;
            $inventoryLogFour->quantity_before = 0;
            $inventoryLogFour->quantity_change = $inventoryFour->initial_quantity;
            $inventoryLogFour->quantity_after = $inventoryLogFour->quantity_before + $inventoryLogFour->quantity_change;
            $inventoryLogFour->description = 'Initial stock';
            $inventoryFour->inventoryLogs()->save($inventoryLogFour);

            DB::commit();
            Log::info('Seed transaction for initial data success');
        } catch (Exception $error) {
            Log::error('Error seeding initial data');
            Log::error($error);
            DB::rollBack();
            throw new Exception($error);
        }
    }
}
