<x-layout>
    <form id="form" action="{{route("store")}}" method="post" class="form">
        @csrf
        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title"><br>
        </div>

        <div>
            <label for="year">Release Year</label><br>
            <input type="number" name="year" id="year"><br>
        </div>

        <div>
            <label for="developer">Developer</label><br>
            <input type="text" name="developer" id="developer"><br>
        </div>

        <div>
            <label for="publisher">Publisher</label><br>
            <input type="text" name="publisher" id="publisher"><br>
        </div>

        <div>
            <label for="description">Description</label> <br>
            <textarea name="description" id="description" rows="20"></textarea><br>
        </div>

        <div>
            <label for="cover">Cover Image</label><br>
            <input type="file" name="cover" id="cover" accept=".jpg, .png, .jpeg, .gif|image/*"><br>
        </div>

        <div>
            <label for="price">Price</label><br>
            <input type="number" name="price" id="price"><br>
        </div>

        <div>
            <label for="tags">Tags</label><br>

            <div class="tags-list" id="tags">

            </div>
            
            <select name="tags" id="tags-dropdown">
                <option value="addtag" disabled hidden>Add Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select><br>
        </div>

        <div>
            <label for="screenshots">Screenshots</label><br>
            <input type="file" name="screenshots" id="screenshots" accept=".jpg, .png, .jpeg, .gif|image/*" multiple><br>
        </div>

        <input type="submit" name="submit" id="submit" onclick="submitClicked()">
    </form>
</x-layout>