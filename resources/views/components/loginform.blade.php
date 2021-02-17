<div class="login login-main d-inline vw-30">
    <h2 class="mb-4">Login</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="post" action="/login">
        @csrf
        <div class="form-group">
            <label for="uid">Email or Academic ID</label>
            <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter your academic ID or Email Address" value="{{ old('uid') }}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password" required>
        </div>
        <div class="buttons d-flex flex-row justify-content-between align-items-center">
            <a href="/register" class="btn btn-primary">Create An Account!</a>
            <button type="submit" class="btn btn-outline-success">Login</button>
        </div>
    </form>
</div>
