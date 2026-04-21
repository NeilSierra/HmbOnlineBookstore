<?php

$SUPABASE_URL = "https://ocrnhozmzyvopzagoeeh.supabase.co";
$SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im9jcm5ob3ptenl2b3B6YWdvZWVoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzY2NjU5ODUsImV4cCI6MjA5MjI0MTk4NX0.8pG_a2WXZH4WJL5A3cfp9ffYadBbAPQSCq4L03NFAlY";

function db_get($table, $filters = "") {
    global $SUPABASE_URL, $SUPABASE_KEY;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => "$SUPABASE_URL/rest/v1/$table?$filters",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            "apikey: $SUPABASE_KEY",
            "Authorization: Bearer $SUPABASE_KEY",
            "Content-Type: application/json",
        ],
    ]);

    $response = curl_exec($ch);
    return json_decode($response, true);
}

function db_insert($table, $data) {
    global $SUPABASE_URL, $SUPABASE_KEY;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => "$SUPABASE_URL/rest/v1/$table",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($data),
        CURLOPT_HTTPHEADER     => [
            "apikey: $SUPABASE_KEY",
            "Authorization: Bearer $SUPABASE_KEY",
            "Content-Type: application/json",
            "Prefer: return=representation",
        ],
    ]);

    $response = curl_exec($ch);
    return json_decode($response, true);
}

function db_update($table, $filter, $data) {
    global $SUPABASE_URL, $SUPABASE_KEY;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => "$SUPABASE_URL/rest/v1/$table?$filter",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => "PATCH",
        CURLOPT_POSTFIELDS     => json_encode($data),
        CURLOPT_HTTPHEADER     => [
            "apikey: $SUPABASE_KEY",
            "Authorization: Bearer $SUPABASE_KEY",
            "Content-Type: application/json",
        ],
    ]);

    $response = curl_exec($ch);
    return json_decode($response, true);
}

function db_delete($table, $filter) {
    global $SUPABASE_URL, $SUPABASE_KEY;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => "$SUPABASE_URL/rest/v1/$table?$filter",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => "DELETE",
        CURLOPT_HTTPHEADER     => [
            "apikey: $SUPABASE_KEY",
            "Authorization: Bearer $SUPABASE_KEY",
            "Content-Type: application/json",
        ],
    ]);

    curl_exec($ch);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup-submit"])) {
    $result = db_insert("Users", [
        "username"      => $_POST["signup-username"],
        "email"         => $_POST["signup-email"],
        "phone_number"  => $_POST["signup-phoneNumber"],
        "password_hash" => password_hash($_POST["signup-password"], PASSWORD_BCRYPT),
        "auth_provider" => "local"
    ]);
}