		window.addEventListener('DOMContentLoaded', () => {
			const btnClass = document.querySelectorAll('#setClass')
			btnClass.forEach((btn) => {
				btn.addEventListener('click', setClass)
			})

			const btnGroup = document.querySelector('#btn-group')
			btnGroup.addEventListener('click', createGroup)

			const btnButton = document.querySelector('#btn-button')
			btnButton.addEventListener('click', createButton)

			const secti = document.querySelectorAll('#secti')
			secti.forEach(btn => {
				btn.addEventListener('click', showClasses)
			})

			// const btnLabel = document.querySelector('#btn-label')
			// btnLabel.addEventListener('click', addLabel)

			// const btnInput = document.querySelector('#btn-input')
			// btnInput.addEventListener('click', addInput)

		})

		// form donde se agregan elementos
		const form = document.querySelector('#custom-form')
		const wrapper = document.querySelector('#wrapper')
		const wrapperForm = document.querySelector('#wrapper-form')
		const wrapperCode = document.querySelector('#wrapper-code')

		const setClass = (e) => {
			const btn = e.target
			const nameClass = btn.innerText

			// btn.classList.toggle('bg-ctaLight')
			// btn.classList.toggle('bg-ctaDark')

			// if (btn.classList.contains(nameClass)) {
			// 	btn.classList.toggle(nameClass)
			// }

			let selected = document.querySelector('.active').value
			let elemento

			if (selected.includes('label')) {
				elemento = document.querySelector(`label[for='${selected.slice(6)}']`)
			} else if (selected.includes('input')) {
				elemento = document.querySelector(`input[name='${selected.slice(6)}']`)
			} else if (selected.includes('group')) {
				// seleccionar parent de input id=name
				elemento = document.getElementById(selected.slice(6)).parentElement
				console.log(elemento)
			} else {
				elemento = document.getElementById(selected)
				console.log(elemento)
			}

			elemento.classList.toggle(nameClass)
			wrapperCode.innerText = wrapperForm.innerHTML
		}

		const getEl = (id) => {
			return document.getElementById(id)
			// console.log(id)
		}

		const createGroup = () => {
			const nameGroup = document.querySelector('#name-group').value
			const selectDiv = document.createElement('div')
			selectDiv.classList.add('flex', 'items-center', 'justify-around')

			const element = `
							<p> Form Group : </p>
							<input type="button" class="p-2 bg-cta text-white" value="group-${nameGroup}" id="btn-select"> 
							<input type="button" class="p-2 bg-cta text-white" value="label-${nameGroup}" id="btn-select"> 
							<input type="button" class="p-2 bg-cta text-white" value="input-${nameGroup}" id="btn-select"> 
				`

			selectDiv.innerHTML = element
			wrapper.append(selectDiv)
			addToForm(nameGroup)
			btnClicked()
		}

		const addToForm = (nameGroup) => {
			const formGroup = document.createElement('div')
			formGroup.classList.add('flex', 'flex-col')
			formGroup.setAttribute('id', 'form-group')

			let label = nameGroup[0].toUpperCase() + nameGroup.slice(1)

			const elements = `
				<label for="${nameGroup}"> ${label} : </label>
				<input type="text" class="" name="${nameGroup}" id="${nameGroup}" placeholder="Escriba su ${nameGroup}">
				`
			formGroup.innerHTML = elements
			form.append(formGroup)
			// console.log(form)
		}

		const btnClicked = () => {
			const selected = document.querySelectorAll('#btn-select')
			selected.forEach( item => {
				item.addEventListener('click', select)
			})
		}

		const select = (e) => {
			const btn = e.target
			btn.classList.toggle('active')
			btn.classList.toggle('bg-dark')
			// console.log(e.target)
		}

		const showClasses = (e) => {
			const btn = e.target
			const icon = e.target.lastElementChild
			icon.classList.toggle('fa-check')
			let classes = btn.nextElementSibling
			classes.classList.toggle('hidden') 
			console.log(classes)
		}

		const createButton = () => {
			const btnName = document.querySelector('#name-button').value
			const btnText = document.querySelector('#btn-text').value

			const btnSelector = document.createElement('div')
			btnSelector.classList.add('flex', 'items-center', 'justify-around')

			const content = ` 
				<p> Button Name</p>
				<input type="button" class="p-2 bg-cta text-white" value="${btnName}" id="btn-select"> 
				`

			btnSelector.innerHTML = content
			wrapper.append(btnSelector)
			
			addBtnToForm(btnName, btnText)
			btnClicked()
		}

		const addBtnToForm = (btnName, btnText) => {
			const btnSubmit = document.createElement('button')
			btnSubmit.setAttribute('type', 'submit')
			btnSubmit.setAttribute('id', btnName)
			btnSubmit.classList.add('bg-cta')
			btnSubmit.innerHTML = btnText

			console.log(btnSubmit)

			form.append(btnSubmit)
		}

