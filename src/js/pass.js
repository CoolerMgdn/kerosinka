if (top.location.search=='') {
    pass = prompt('Введите пароль');
    if (pass=='123'){ 
        alert('Пароль принят') 
    } else { 
        alert('Пароль непринят!'), top.location.href='index.php' 
    }
};