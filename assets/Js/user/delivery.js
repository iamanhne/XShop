const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const tabs = $$('.tab-item');
const panes = $$('.address-chitiet');
            
const tabActive = $('.tab-item.active');
const tabActiveLine = $('.address-container .line');

tabActiveLine.style.left = tabActive.offsetLeft + 'px';
tabActiveLine.style.width = tabActive.offsetWidth + 'px';

tabs.forEach((tab,index) => {
    const pane = panes[index];

    tab.onclick =  function () {
        $('.address-chitiet.activePane').classList.remove('activePane');
        $('.tab-item.active').classList.remove('active');
        tabActiveLine.style.left = this.offsetLeft + 'px';
        tabActiveLine.style.width = this.offsetWidth + 'px';
        this.classList.add('active');
        pane.classList.add('activePane');  
    }
})


//
document.addEventListener('DOMContentLoaded', function () {
    fetchProvinces();
});

function fetchProvinces() {
    fetch('https://nominatim.openstreetmap.org/search.php?q=Vietnam&format=json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        const provinces = data.filter(location => location.type === 'administrative' && location.class === 'boundary' && location.address.country === 'Vietnam');
        if (provinces.length === 0) {
            throw new Error('No provinces found');
        }
        const provinceNames = provinces.map(province => province.display_name);
        displayProvinces(provinceNames);
    })
    .catch(error => {
        console.error('Error fetching provinces:', error);
        alert('An error occurred while fetching provinces. Please try again later.');
    });
}

function displayProvinces(provinceNames) {
    const provinceList = document.getElementById('province-list');
    provinceNames.forEach(provinceName => {
        const listItem = document.createElement('li');
        listItem.textContent = provinceName;
        provinceList.appendChild(listItem);
    });
}
