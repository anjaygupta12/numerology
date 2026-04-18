<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create name numerology package
        Package::create([
            'name' => 'Name Numerology Basic',
            'type' => 'name',
            'description' => 'Discover the hidden meanings and influences behind your name. This basic package includes a detailed analysis of your name\'s numerological value and its impact on your personality.',
            'price' => 499.00,
            'active' => true,
        ]);

        Package::create([
            'name' => 'Name Numerology Premium',
            'type' => 'name',
            'description' => 'An in-depth analysis of your name\'s numerological significance. Includes personality traits, career path guidance, and relationship compatibility insights.',
            'price' => 999.00,
            'active' => true,
        ]);

        // Create mobile numerology package
        Package::create([
            'name' => 'Mobile Numerology Basic',
            'type' => 'mobile',
            'description' => 'Learn how your mobile number influences your daily life and energy. This package provides a basic analysis of your mobile number\'s numerological significance.',
            'price' => 399.00,
            'active' => true,
        ]);

        Package::create([
            'name' => 'Mobile Numerology Premium',
            'type' => 'mobile',
            'description' => 'A comprehensive analysis of your mobile number\'s vibration and its impact on your communication, opportunities, and overall energy.',
            'price' => 799.00,
            'active' => true,
        ]);

        // Create birth numerology package
        Package::create([
            'name' => 'Birth Numerology Basic',
            'type' => 'birth',
            'description' => 'Understand your life path and destiny through your birth date. This package offers a basic analysis of your birth date\'s numerological significance.',
            'price' => 599.00,
            'active' => true,
        ]);

        Package::create([
            'name' => 'Birth Numerology Premium',
            'type' => 'birth',
            'description' => 'A detailed analysis of your birth date, including life path number, destiny number, and personal year cycles. Includes future predictions and guidance.',
            'price' => 1199.00,
            'active' => true,
        ]);
    }
}
