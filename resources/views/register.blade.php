<x-layout>
    <form action="{{route("register")}}" method="POST" class="form login-form">
        @csrf
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required><br>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span><br>
            @endif

            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required><br>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span><br>
            @endif

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span><br>
            @endif
        </div>

        <input type="submit" name="submit" id="submit" value="Create Account">
    
        <div class="align-center">
            <a href="{{route("show-login")}}">Already have an account?</a>
        </div>
    </form>
</x-layout>