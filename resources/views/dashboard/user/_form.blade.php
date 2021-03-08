                @csrf
            
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}"> 
                    @error('name') 
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" class="form-control" name="surname" value="{{old('surname',$user->surname)}}">
                    @error('surname')
                    <small class="text-danger">{{$message}}</small>
                    @enderror  
                         
                </div>
                <!-- ./form-group -->

        

                <div class="form-group">
                    <label for="rol_id">Rol</label>
                    <select class="form-control" name="rol_id" id="rol_id">
                        @foreach ($rols as $key => $id)
                        <option {{$user->rol_id==$id?'selected="selected"':''}} value="{{$id}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- ./form-group -->


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror  
                </div>
                <!-- ./form-group -->


               
                   @if ($pwd)
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password',$user->password)}}">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror            
                </div>
                <!-- ./form-group -->
                       
                   @endif
                   
               


            <button class="btn btn-primary rounded-pill">Guardar</button>