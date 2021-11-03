<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;
use Storage;

use App\Helpers\ImageUploadHelper;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $jsonString = file_get_contents(config_path('appInfo.json'));
        $appInfo = json_decode($jsonString, true);
    	//$appInfo = appInfo();
    	return view('dashboard.home', compact('appInfo'));
    }

    public function updateBasicInfo(Request $request)
    {
    	$jsonString = file_get_contents(config_path('appInfo.json'));
		$getAppInfo = json_decode($jsonString, true);

		$updateAppInfo = [];

		foreach ($getAppInfo as $prop => $val) {
			if($request->input(strtolower($prop)))
			{
				$updateAppInfo[strtolower($prop)] = $request->input(strtolower($prop));
			}else{
				$updateAppInfo[strtolower($prop)] = $val;
			}
		}

		if ($request->hasFile('logo')) {
            $storeImage = new ImageUploadHelper;
            $width = $height = null;
            // 1 mb = 1048576 bytes in binary which is countable for the image size here
            $logo = $storeImage->uploadImage(null, $request->file('logo'), 'img', $updateAppInfo['logo'], 2048000, $width, $height, $updateAppInfo['application_name'], ['width' => null, 'height' => null, 'thumbStorageName' => null] );
            if($logo == 'MaxSizeErr') {
                return back()->with('message_warning', 'Too large file (max limit:1mb)');
            }
            $updateAppInfo['logo'] = $logo;
        }

        if ($request->hasFile('favicon')) {
            $storeImage = new ImageUploadHelper;
            $width = $height = null;
            // 1 mb = 1048576 bytes in binary which is countable for the image size here
            $favicon = $storeImage->uploadImage(null, $request->file('favicon'), 'favicon', $updateAppInfo['favicon'], 1024000, $width, $height, $updateAppInfo['application_name'], ['width' => null, 'height' => null, 'thumbStorageName' => null] );
            if($favicon == 'MaxSizeErr') {
                return back()->with('message_warning', 'Too large file (max limit:1mb)');
            }
            $updateAppInfo['favicon'] = $favicon;
        }

		// empty json first
		file_put_contents(config_path('appInfo.json'), json_encode([]));
		file_put_contents(config_path('appInfo.json'), json_encode($updateAppInfo));

		return redirect()->route('dboard./')->with('message_success','Basic information updated successfully.');
    }
}