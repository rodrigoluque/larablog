@csrf
           
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" class="form-control" name="title" value="{{old('title',$category->title)}}"> 
                    @error('title') 
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                         
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="">Url</label>
                    <input type="text" class="form-control" name="url" value="{{old('url',$category->url)}}">
                    @error('url')
                    <small class="text-danger">{{$message}}</small>
                    @enderror  
                         
                </div>
                <!-- ./form-group -->
           

            <button class="btn btn-primary rounded-pill">Guardar</button>