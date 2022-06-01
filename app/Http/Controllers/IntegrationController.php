<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegrationRequest;
use App\Models\Integration;
use App\Models\User;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;
use Auth;
use MongoDB\Driver\Session;

class IntegrationController extends Controller
{
    public function create(IntegrationRequest $request)
    {
        if ($request['marketplace'] == "n11" || $request['marketplace'] == "trendyol")
        {
          $integration =  Integration::create([
                'marketplace' => $request['marketplace'],
                'username' => $request['username'],
                'password' => $request['password'],
                'user_id' => $request['user_id'],
            ]);

          return response()->json([
              'message' => 'başarılı'
          ]);
        }
        else
        {
            return response()->json([
                'message' => 'marketplace n11 veya trendyol olmalı',
                'status' => 422
            ]);
        }
    }

    public function update(IntegrationRequest $request,$id)
    {
        if ($request['marketplace'] == "n11" || $request['marketplace'] == "trendyol") {
            $integration = Integration::find($id)->update([
                'marketplace' => $request['marketplace'],
                'username' => $request['username'],
                'password' => $request['password'],
                'user_id' => $request['user_id'],
            ]);

            return response()->json([
                'message' => 'başarılı'
            ]);
        } else {

            return response()->json([
                'message' => "Hatalı işlem"
            ]);
        }
    }

    public function deleted($id)
    {
        if (is_null($id))
        {
            $deleteIntegration = Integration::find($id);
            $deleteIntegration->delete();

            return response()->json(['message' => 'Silme İşlemi başarılı'],200);
        }
        else
        {
            return response()->json([
                'message' => 'Silme işlemi başarısız'
            ]);
        }
    }



}
