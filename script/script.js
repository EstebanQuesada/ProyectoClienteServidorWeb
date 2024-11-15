function showProvince(provinceName) {
    const info = document.getElementById('info');
    const infoContainer = document.getElementById('info-container');

    info.textContent = `Has seleccionado la provincia de: ${provinceName}`;

    const colors = {
        "Guanacaste": "#229726",  
        "Alajuela": "#bf0c0c",    
        "San José": "#4e005a",    
        "Heredia": "#c58007",     
        "Cartago": "#1d0598",     
        "Limón": "#818705",       
        "Puntarenas": "#00BCD4"   
    };
    infoContainer.style.borderColor = colors[provinceName];
}
