                @csrf
            
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" class="form-control" name="title" value="{{old('title',$post->title)}}"> 
                    @error('title') 
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                         
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="">Url</label>
                    <input type="text" class="form-control" name="url" value="{{old('url',$post->url)}}">
                    @error('url')
                    <small class="text-danger">{{$message}}</small>
                    @enderror  
                         
                </div>
                <!-- ./form-group -->

                <div class="form-group">
                    <label for="">Categorias</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $title => $id)
                        <option {{$post->category_id==$id?'selected="selected"':''}} value="{{$id}}">{{$title}}</option>
                        @endforeach
                    </select>
                </div>
           <!-- ./form-group -->


           <div class="form-group">
            <label for="posted">Posteado</label>
            <select class="form-control" name="posted" id="posted">
                @include('dashboard.partials.option-yes-not',['val'=>$post->posted])
            </select>
        </div>
   <!-- ./form-group -->


           
                <div class="form-group">
                <label for="">Contenido</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content',$post->content)}}</textarea> 
                
                @error('content')
                    <small class="text-danger">{{$message}}</small>
                @enderror 
            </div>
            <!-- ./form-group -->
            

            <button class="btn btn-primary rounded-pill">Guardar</button>