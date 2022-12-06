<x-guest-layout>
        <form method="POST" action="{{ route('login') }}" class="coolForm">
          @csrf
          <div class='coolWindow'>
              
              <div class="coolTitle">Добро пожаловать</div>
              <div class="coolSubtitle">Введите данные:</div>
            <div class='input-container ic1'>
                <input class='coolInput' type="email" name="email" placeholder=' ' />
                <div class="cut"></div>
                <label for='email' class='placeholder'>email</label>
            </div>
               
            <div class='input-container ic2'>                  
                <input class="coolInput" type="password" name="password" placeholder=" " />
                <div class="cut"></div>
                <label for='password' class='placeholder'>password</label>
            </div>    
              
            <div>
                запомнить меня? <input id="remember_me" type="checkbox" name="remember"><br>
                <button type="submit" class="coolSubmit">войти</button><br>
            </div>
          </div>
        </form>
        <x-auth-session-status class="mb-4" :status="session('status')" />
</x-guest-layout>
