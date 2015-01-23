<form action="procesar.php" method="POST"
enctype="multipart/form-data">
    <ul>
        <li>
            <label>id</label>
            <input type="hidden" name="id" />
        </li>
        <li>
            <label>Nombre</label>
            <input type="text" name="name" />
        </li>
        <li>
            <label>Email</label>
            <input type="email" name="email" />
        </li>
        <li>
            <label>Contraseña</label>
            <input type="password" name="password" />
        </li>
        <li>
            <label>Fecha de nacimiento</label>
            <input type="date" name="bdate" />
        </li>
        <li>
            <label>Descripcion</label>
            <textarea rows="" cols="" name="description"></textarea>
        </li>
        <li>
            <label>Foto</label>
            <input type="file" name="photo" />
        </li>
        <li>
            <label>Privacidad</label>
            Si<input type="checkbox" name="privacy[]" value="si"/>
            Spam<input type="checkbox" name="privacy[]" value="spam"/>
        </li>
        <li>
            <label>Sexo</label>
            M<input type="radio" name="gender" value="m"/>
            H<input type="radio" name="gender" value="h"/>
            O<input type="radio" name="gender" value="o"/>            
        </li>
        <li>
            <label>Ciudad</label>
            <select name="city">
                <option>Valencia</option>
                <option>Barcelona</option>
                <option>Madrid</option>                
            </select>
        </li>
        
        <li>
            <label>Aficiones</label>
            <select multiple name="hobbies[]">
                <option>Cine</option>
                <option>Deporte</option>
                <option>Viajes</option>                
            </select>
        </li>
        <li>
            <label>Enviar</label>
            <input type="submit" name="submit" />
        </li>
    </ul>
</form>

