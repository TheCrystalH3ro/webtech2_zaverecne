<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function csvDownload()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('config.php');


        // Table name


        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="output.csv"');

        // Construct the SQL query to export table to CSV
        $sql = "SELECT * FROM games";

        // Execute the query
        $stmt = $db->query($sql);

        // Fetch all rows from the result set
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Create a file handle using output buffering
        $csvFile = fopen('php://output', 'w');

        // Write the column headers to the CSV file
        if (!empty($data)) {
            $columnHeaders = array_keys($data[0]);
            fputcsv($csvFile, $columnHeaders);
        }

        // Write the data rows to the CSV file
        foreach ($data as $row) {
            fputcsv($csvFile, $row);
        }

        // Close the file handle
        fclose($csvFile);

        // Flush the output buffer to send the file to the browser
        flush();

    }
}