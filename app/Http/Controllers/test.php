  <?php  
    public function login(Request $request)
    {
        $academicid = $request->academicid;

        if ($academicid == null) {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'message' => 'Academic ID is null'
            ]);
        }

        if (User::where('academicid', $academicid)->exists()) {
            $response = Http::post('https://portal.aiub.edu/login', [
                'UserName' => $request->username,
                'Password' => $request->password,
                'fingerPrint' => Str::random(32),
            ]);

            //TODO: create token after successful login

            if (Str::contains($response->body(), 'Welcome') && Str::contains($response->body(), 'Academics') && Str::contains($response->body(), 'Grade Reports')) {
                $name = '';
                $str = '/Student/Home/Profile" class="navbar-link"><small>';

                $pos = strpos($response->body(), $str);
                $namecontain  = substr($response->body(), $pos + strlen($str), 100);
                $name = explode('<', $namecontain)[0];

                return response()->json([
                    'login' => true,
                    'name' => $name,
                    'gotid' => $academicid,
                    'success' => true,
                    'studentexists' => true,
                    'student' => User::where('academicid', $request->academicid)->get(),

                    // 'body' => $response->body(),
                ]);
            } else {
                return response()->json([
                    'login' => false,
                    'body' => $response->body(),
                ]);
            }
            return response()->json([
                'gotid' => $academicid,
                'success' => true,
                'studentexists' => true,
                'student' => User::where('academicid', $request->academicid)->get(),
            ]);
        } else {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'studentexists' => false
            ]);
        }
    }