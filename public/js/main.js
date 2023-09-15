

window.addEventListener('DOMContentLoaded', () => {
  // ************ desktop user menu button
  const userBtn = document.querySelector('#user-btn')
  userBtn?.addEventListener('click', () => {
    const userMenu = document.querySelector('#user-menu')
    const userClasses = ['flex','hidden']
    multiToggle(userMenu,userClasses)
  })

  // ************ mobile hamburguer button
  const mobileBtn = document.querySelector('#mobile-btn');
  mobileBtn?.addEventListener('click', () => {
    mobileBtn.classList.toggle('open')
    const mobileMenu = document.querySelector('#mobile-menu');
    const classes = ['flex','hidden']
    multiToggle(mobileMenu,classes)

    setSubMenu()
  })

  // ************ footer acordion
  const btnAcordion = document.querySelectorAll('#btn-acordion')
  btnAcordion?.forEach((btn) => {
    btn.addEventListener('click', () => {
      btn.nextElementSibling.classList.toggle('hidden')
      btn.lastElementChild.classList.toggle('fa-chevron-up')
      btn.lastElementChild.classList.toggle('fa-chevron-down')
    })
  })


})


const setSubMenu = () => {
  const allMenuLinks = document.querySelectorAll('.menu')
  allMenuLinks?.forEach(link => {
    link.addEventListener('click', (e) => {
       e.preventDefault();
      let next = e.target.nextElementSibling
        next.classList.toggle('hidden')

        const duration = 100
        setTimeout(() => {
          next.classList.toggle('sub-open')

          console.log(next)
        }, duration)
      
    })
  })
}



const multiToggle = (el,classes) => {
  classes.map(item => el.classList.toggle(item))
}

// const topBtn = document.querySelector('#top_btn')
// topBtn?.addEventListener('click', () => {
//   window.scrollTo({top:0, behavior: 'smooth'})
// })

// window.addEventListener('scroll', () => {

//   if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
//     topBtn.classList.remove('hidden')

//   } else {
//     topBtn.classList.add('hidden')
//   }
// })

