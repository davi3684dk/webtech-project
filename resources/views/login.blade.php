<x-layout>
    <form action="{{route("login")}}" method="POST" class="form">
        @csrf
        <div>
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" required value="{{ old('email') }}"><br>
    
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br>
            @if ($errors->has('emailPassword'))
                <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
            @endif
        </div>

        <input type="submit" name="submit" id="submit" value="Login">

        <div class="align-center">
            <a href="{{route("show-register")}}">Create an account instead</a>
        </div>
        
    </form>

    
</x-layout>