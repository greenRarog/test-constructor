let cube = [];
    cube[1] = document.querySelector('.one_point');
    cube[2] = document.querySelector('.two_point');
    cube[3] = document.querySelector('.three_point');
    cube[4] = document.querySelector('.four_point');
    cube[5] = document.querySelector('.five_point');
    cube[6] = document.querySelector('.six_point');
let players = [];
let winner;
let point;
let button = document.querySelector('.game_button');
let message = document.querySelector('.game_text');
let computer_move = document.querySelector('.computer_move');
let gamer_move = document.querySelector('.gamer_move');
let gamer = document.querySelector('.gamer');
let computer = document.querySelector('.computer');
button.addEventListener('click', getStart);
                                
function getStart() {        
    gamer.textContent = ''; 
    message.textContent = 'правила просты: сперва кидаете кости на право превого хода';
    button.value = 'бросить кости';
    button.removeEventListener('click', getStart);
    button.addEventListener('click', stepOne);    
}
       
        
function stepOne() {    
    gamer.textContent = 'ХОД ИГРОКА';
    printMove(gamer_move,players['gamer'] = move());
    message.textContent = '';
    button.value = 'дальше';
    button.removeEventListener('click', stepOne);            
    button.addEventListener('click', stepTwo);    
}        

function stepTwo() {
    computer.textContent = 'ХОД КОМПЬЮТЕРА';
    printMove(computer_move,players['computer'] = move());
    button.value = 'далее';
    button.removeEventListener('click', stepTwo);
    button.addEventListener('click', mainGameInfo);    
}
    
function mainGameInfo() {
    if (players['gamer'][2] > players['computer'][2]){            
            winner = 'ИГРОК';
            message.innerHTML = message.innerHTML + '<br>право первого хода достается Вам!';
            button.value = 'к основной игре!';
            button.removeEventListener('click', mainGameInfo);        
            button.addEventListener('click', mainGameRule);            
        } else if(players['gamer'][2] < players['computer'][2]) {
            winner = 'КОМПЬЮТЕР';
            message.innerHTML = message.innerHTML + '<br>право первого хода - за компьютером';
            button.value = 'к основной игре!';
            button.removeEventListener('click', mainGameInfo);        
            button.addEventListener('click', mainGameRule);
        } else {
            message.innerHTML = message.innerHTML + '<br>Вы выбросили одинаково! нужно перебросить кости, чтобы найти победителя';
            button.value = 'переиграть!';
            button.removeEventListener('click', mainGameInfo);        
            button.addEventListener('click', stepOne);
        }                        
}

function mainGameRule() {
    computer.textContent = '';
    gamer.textContent = '';
    computer_move.textContent = '';
    gamer_move.textContent = '';
    message.innerHTML = 'правила основной игры: игрок кидает кости. если выпадает 7 или 11 то игрок сразу выйгрывает. если выпадает 2 или 3 или 12 - сразу проигрывает. попробуйте!';
    button.value = 'играть';
    button.removeEventListener('click', mainGameRule);        
    button.addEventListener('click', mainGame);    
}
    
function mainGame() {        
    message.textContent = '';
    gamer_move.textContent = '';
    computer_move.textContent = '';
    actualPlayer = winner;        
    gamer.textContent = 'ГЛАВНЫЙ БРОСОК';
    printMove(gamer_move,players[actualPlayer] = move());    
    
    if (players[actualPlayer][2] == '7' | players[actualPlayer][2] == '11') {
        message.innerHTML = message.innerHTML + '<br>Победил ' + actualPlayer + ' может сыграем еще разок?';
        button.value = 'еще!';
        button.removeEventListener('click', mainGame);
        button.addEventListener('click', getStart);
    } else if (players[actualPlayer][2] == '2' | players[actualPlayer][2] == '3' | players[actualPlayer][2] == '12') {
        message.innerHTML = message.innerHTML + '<br>Проиграл ' + actualPlayer + ' может сыграем еще разок?';
        button.value = 'еще!';
        button.removeEventListener('click', mainGame);
        button.addEventListener('click', getStart);        
    } else {
        point = players[actualPlayer][2];
        message.innerHTML = message.innerHTML + '<br>point! это значит что теперь игрок будет перебрасывать кости пока не выпадет 7(и он проиграет) или point(и он победит)';
        button.value = 'продолжаем';
        button.removeEventListener('click', mainGame);
        button.addEventListener('click', pointGame);        
    }
}

function pointGame() {
    computer_move.textContent = '';
    computer.textContent = 'ИЩЕМ ПОИНТ';
    printMove(computer_move,players[actualPlayer] = move());
    if (players[actualPlayer][2] === point) {        
        message.textContent = 'Поздравляем победителя ' + actualPlayer +'!';
        button.removeEventListener('click', pointGame);
        button.value = 'еще разок?';
        button.addEventListener('click', getStart);                
    } else if (players[actualPlayer][2] == '7') {        
        message.textContent = 'Сожалеем, но ' + actualPlayer +'проиграл!';
        button.removeEventListener('click', pointGame);
        button.value = 'еще разок?';
        button.addEventListener('click', getStart);                        
    } else {
        button.value = 'кинуть кости еще раз!';
    }
    
}

function move() {
    let cube_1 = roll();
    let cube_2 = roll();
    let sum = cube_1 + cube_2;    
    return [cube_1, cube_2, sum];
}

function printMove(inner,array) {
    cube_1 = array[0];
    cube_2 = array[1];
    inner.innerHTML = cube[cube_1].innerHTML + cube[cube_2].innerHTML;
}

function roll() {
    return Math.floor(Math.random() * 6) + 1;
}