const about = document.getElementById('about')
const skills = document.getElementById('skills')
const contact = document.getElementById('contact')

const aboutMe = document.getElementById('about-me')
const mySkills = document.getElementById('my-skills')
const getMe = document.getElementById('get-me')


about.addEventListener('click', (event) => {
    aboutMe.style.display = "block"
    mySkills.style.display = "none"
    getMe.style.display = "none"

    about.classList.add('tentang','pb-2')
    contact.classList.remove('tentang','pb-2')
    skills.classList.remove('tentang', 'pb-2')
})

skills.addEventListener('click', (event) => {
    aboutMe.style.display = "none"
    mySkills.style.display = "block"
    getMe.style.display = "none"

    skills.classList.add('tentang', 'pb-2')
    contact.classList.remove('tentang','pb-2')
    about.classList.remove('tentang', 'pb-2')
})

contact.addEventListener('click', () => {
    aboutMe.style.display = "none"
    mySkills.style.display = "none"
    getMe.style.display = "block"

    contact.classList.add('tentang', 'pb-2')
    about.classList.remove('tentang', 'pb-2')
    skills.classList.remove('tentang', 'pb-2')
})