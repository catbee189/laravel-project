@extends('layout')
@section('title', 'Settings')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Application Settings</h5>
    </div>

    <div class="card-body">

        <form action="#" method="POST">
            @csrf

            <h6 class="border-bottom pb-2 mb-3">General Settings</h6>

            <div class="mb-3">
                <label class="form-label">System Name</label>
                <input type="text" class="form-control" name="system_name"
                    value="Library Record System">
            </div>

            <div class="mb-3">
                <label class="form-label">Default Language</label>
                <select class="form-select" name="language">
                    <option selected>English</option>
                    <option>Filipino</option>
                </select>
            </div>

            <hr>

            <h6 class="border-bottom pb-2 mb-3">Notification Settings</h6>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="email_notifications" checked>
                <label class="form-check-label" for="email_notifications">
                    Enable Email Notifications
                </label>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="system_alerts" checked>
                <label class="form-check-label" for="system_alerts">
                    Enable System Alerts
                </label>
            </div>

            <hr>

            <h6 class="border-bottom pb-2 mb-3">Appearance Settings</h6>

            <div class="mb-3">
                <label class="form-label">Theme</label>
                <select class="form-select" name="theme">
                    <option selected>Light</option>
                    <option>Dark</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Records Per Page</label>
                <select class="form-select" name="records_per_page">
                    <option>10</option>
                    <option selected>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>

            <hr>

            <h6 class="border-bottom pb-2 mb-3 text-danger">
                Security Settings
            </h6>

            <div class="mb-3">
                <label class="form-label">Session Timeout (Minutes)</label>
                <input type="number" class="form-control" value="30">
            </div>

            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="two_factor">
                <label class="form-check-label" for="two_factor">
                    Enable Two-Factor Authentication
                </label>
            </div>

            <div class="text-end">
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>

                <button type="submit" class="btn btn-primary">
                    Save Settings
                </button>
            </div>

        </form>

    </div>
</div>

@endsection