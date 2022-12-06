<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="coolForm">
            @csrf                            
            <div class="coolWindow">
                
              <div class="coolSubtitle">Введите данные:</div>
                <div class="input-container ic1">
                    <input name="name" class="coolInput" type="text" placeholder=" ">
                    <div class="cut"></div>
                    <label for='name' class="placeholder">имя</label>
                </div>
            
                <div class='input-container ic2'>                    
                    <input type="email" name="email" class='coolInput' placeholder=" ">
                    <div class='cut'></div>
                    <label for='email' class='placeholder'>email</label>
                </div>    
            
                <div class='input-container ic2'>
                    <input type="password" name="password" class='coolInput' placeholder=" ">
                    <div class='cut'></div>
                    <label for='password' class='placeholder'>пароль</label>
                </div>    

                <div class='input-container ic2'>
                    <input type="password" name="password_confirmation" class='coolInput' placeholder=" ">
                    <div class='cut'></div>
                    <label for='password_confirmation' class='placeholder'>подтверждение</label>
                </div>    
            
                <div>                
                    <button type="submit" class='coolSubmit'>регистрация</button>
                </div>    
              
            </div>
        </form>            
</x-guest-layout>
