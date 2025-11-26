<?php

// ========================================

// 4. resources/views/dashboard/index.blade.php

// ========================================

?>

@extends('layouts.app')

@section('title', 'User Dashboard - Faculty of Economics and Business')

@section('header')

    <h1 class="page-title">Welcome back, {{ $user->name }}!</h1>

    <p class="page-subtitle">Here's what's happening with your account today.</p>

@endsection

@section('content')

<div class="content-card">

    <h3 style="margin-bottom: 1.5rem; color: #333; font-weight: 600;">

        <i class="fas fa-chart-line" style="color: #667eea;"></i> Account Overview

    </h3>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">

        <!-- Profile Completion -->

        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.5rem; border-radius: 12px;">

            <div style="display: flex; align-items: center; justify-content: space-between;">

                <div>

                    <h4 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem;">{{ $stats['profile_completion'] }}%</h4>

                    <p style="opacity: 0.9;">Profile Complete</p>

                </div>

                <i class="fas fa-user-check" style="font-size: 2rem; opacity: 0.7;"></i>

            </div>

        </div>

        <!-- Account Created -->

        <div style="background: linear-gradient(135deg, #2ed573 0%, #17a2b8 100%); color: white; padding: 1.5rem; border-radius: 12px;">

            <div style="display: flex; align-items: center; justify-content: space-between;">

                <div>

                    <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $stats['account_created'] }}</h4>

                    <p style="opacity: 0.9;">Member Since</p>

                </div>

                <i class="fas fa-calendar-alt" style="font-size: 2rem; opacity: 0.7;"></i>

            </div>

        </div>

        <!-- Last Login -->

        <div style="background: linear-gradient(135deg, #ffa726 0%, #ff7043 100%); color: white; padding: 1.5rem; border-radius: 12px;">

            <div style="display: flex; align-items: center; justify-content: space-between;">

                <div>

                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $stats['last_login'] }}</h4>

                    <p style="opacity: 0.9;">Last Activity</p>

                </div>

                <i class="fas fa-clock" style="font-size: 2rem; opacity: 0.7;"></i>

            </div>

        </div>

    </div>

</div>

<div class="content-card">

    <h3 style="margin-bottom: 1.5rem; color: #333; font-weight: 600;">

        <i class="fas fa-user-circle" style="color: #667eea;"></i> Account Information

    </h3>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">

        <div>

            <h4 style="color: #555; margin-bottom: 1rem;">Personal Details</h4>

            {{-- PERBAIKAN DI BAWAH INI --}}
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">

                <p><strong>Name:</strong> {{ $user->name }}</p>

                <p><strong>Email:</strong> {{ $user->email }}</p>

                <p><strong>Role:</strong> <span style="background: #e3f2fd; color: #1976d2; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem;">{{ ucfirst($user->role) }}</span></p>

                <p><strong>Account Status:</strong> <span style="background: #e8f5e8; color: #2e7d32; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem;">Active</span></p>

            </div>

        </div>

        <div>

            <h4 style="color: #555; margin-bottom: 1rem;">Quick Actions</h4>

            <div style="display: flex; flex-direction: column; gap: 0.75rem;">

                <a href="{{ route('user.profile') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">

                    <i class="fas fa-edit"></i> Edit Profile

                </a>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #dc3545; color: white; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">

                    <i class="fas fa-sign-out-alt"></i> Logout

                </a>

            </div>

        </div>

    </div>

</div>

<div class="content-card">

    <h3 style="margin-bottom: 1.5rem; color: #333; font-weight: 600;">

        <i class="fas fa-info-circle" style="color: #667eea;"></i> Getting Started

    </h3>

    <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #667eea;">

        <h4 style="color: #333; margin-bottom: 1rem;">Welcome to Faculty Dashboard</h4>

        <p style="color: #666; margin-bottom: 1rem;">This is your personal dashboard where you can manage your account and access various features. Here are some things you can do:</p>

        <ul style="color: #666; padding-left: 1.5rem;">

            <li>Update your profile information</li>

            <li>Change your password</li>

            <li>View your account statistics</li>

            <li>Access faculty resources</li>

        </ul>

    </div>

</div>  