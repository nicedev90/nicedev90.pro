// check for valid email event
const emailGroup = document.querySelector('#email-group')

const inputEmail = document.querySelector('#email')
inputEmail.addEventListener('keyup', (e) => {
	let email = inputEmail.value
	if(email.includes('@', 5)) {
		emailGroup.classList.add('valid')
	} else {
		emailGroup.classList.remove('valid')
	}
})


let passGroup = document.querySelector('#pass-group')

const inputPass = document.querySelector('#password')
inputPass.addEventListener('keyup', (e) => {
	
	let password = inputPass.value
	let valid = validPass(password)

	if(valid === 0) {
		passGroup.classList.remove('weak')
		passGroup.classList.remove('medium')
		passGroup.classList.remove('strong')
	}	else if(valid <= 2) { 
		passGroup.classList.add('weak')
		passGroup.classList.remove('medium')
		passGroup.classList.remove('strong')
	}	else if(valid >= 2 && valid <= 4) {
		passGroup.classList.remove('weak')
		passGroup.classList.add('medium')
		passGroup.classList.remove('strong')
	} else {
		passGroup.classList.remove('weak')
		passGroup.classList.remove('medium')
		passGroup.classList.add('strong')
	}
})


let show = document.querySelector('#show')
show.addEventListener('click', () => {
	if(inputPass.type === 'password') {
		inputPass.setAttribute('type', 'text')
		show.classList.add('hide')
	} else {
		inputPass.setAttribute('type', 'password')
		show.classList.remove('hide')
	}
})

const validPass = (password) => {
	let i = 0
	if(password.length >= 4) {
		i++
	}

	if(password.length >= 8) {
		i++
	}

	if(password.length >= 10) {
		i++
	}

	if(/[A -Z]/.test(password)) {
		i++
	}

	if(/[1 - 9]/.test(password)) {
		i++
	}

	if(/[A-Za-z0-3]/.test(password)) {
		i++
	}

	return i
}


