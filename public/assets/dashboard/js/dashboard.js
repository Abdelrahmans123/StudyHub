const sideMenu=document.querySelector('aside');
const menuBtn=document.querySelector('#menu-btn');
const closeBtn=document.querySelector('#closeBtn');
const themeToggle=document.querySelector('.theme-toggle');

menuBtn.addEventListener('click',()=>{
    sideMenu.style.display='block';
});
closeBtn.addEventListener('click',()=>{
    sideMenu.style.display='none';
});
themeToggle.addEventListener('click',()=>{
    console.log(themeToggle);
    document.body.classList.toggle('dark-theme-variables');
    const selectedTheme = document.body.classList.contains('dark-theme-variables') ? 'dark' : 'light';
    localStorage.setItem('theme', selectedTheme);
    themeToggle.querySelector('.theme-toggle--icon:nth-child(1)').classList.toggle('active');
    themeToggle.querySelector('.theme-toggle--icon:nth-child(2)').classList.toggle('active');

});
const selectedTheme = localStorage.getItem('theme');

// Apply the selected theme class to the HTML body element
if (selectedTheme === 'dark') {
    document.body.classList.add('dark-theme-variables');
    themeToggle.querySelector('.theme-toggle--icon').classList.remove('active');
    themeToggle.querySelector('.theme-toggle--icon:nth-child(2)').classList.add('active');

} else {
    document.body.classList.remove('dark-theme-variables');
    themeToggle.querySelector('.theme-toggle--icon:nth-child(1)').classList.add('active');
}



