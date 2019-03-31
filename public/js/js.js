window.onload = ()=>
{
	let container = document.getElementById('container');
	let firstChild = container.firstElementChild;
	let secondChild = container.lastElementChild;

	function stekDelete()
	{
		let counter = 'push';
		let nodeElement = null;
		let obj = {
			'push':function(myEvent)
			{
				let modal = document.createElement('div');
				let remBtn = document.createElement('button');
				let editBtn = document.createElement('button');
				modal.className = 'modal';
				remBtn.innerHTML = 'Delete';
				editBtn.innerHTML = 'Edit';

				modal.style.top = myEvent.clientY + 'px';
				modal.style.left = myEvent.clientX + 'px';

				modal.appendChild(remBtn);
				modal.appendChild(editBtn);

				nodeElement = modal;
				document.body.appendChild(modal);

				modal.addEventListener('click',(event)=>{
					let target = event.target;
					let newProm2 = new Promise((suc,rej)=>{
					suc(target.tagName == 'BUTTON');
				});
					wait();
					async function wait()
					{
						if(await newProm2)
						{
							objListener[event.target.innerHTML]	();
						}
					}
				});

				counter = 'pop';
			},
			'pop':function(myEvent)
			{
				nodeElement.style.top = myEvent.clientY + 'px';
				nodeElement.style.left = myEvent.clientX + 'px';
			}
		}
		return function(nodeElem)
		{
			obj[counter](nodeElem);
		};
	}
	let utilizator = stekDelete();
		

	firstChild.addEventListener('contextmenu',function(event){
		let target = event.target;
		let newProm = new Promise((suc,rej)=>{
			suc(target.tagName == 'A' || target.tagName == 'IMG');
		});

		wait();
		async function wait()
		{
			if(await newProm)
			{
				event.preventDefault();
				utilizator(event);
				instOfLe.setEv(event);
			}
			
		}
		
	});
	secondChild.addEventListener('mousedown',function(event){
		var target = event.target;
		if(target.tagName === 'BUTTON')
		{
			let selector = target.parentNode.querySelector('select');
			var link = selector.value;
			var win = window.open(link,'_blank');
				if(win)
				{
					win.focus();
					selector.classList.remove('highlight');
				}
				else
				{
					alert('Please allow popups for this website');
				}	
		}
		else if(target.tagName === "SELECT")
		{
			target.classList.add('highlight');
			target.addEventListener('blur',()=>{
				target.classList.remove('highlight');
				target.removeEventListener('blur',()=>{console.log('here');});
			});
		}
		return;
	});

	container.removeChild(secondChild);

	let childrenNodes = Object.create(null);
	childrenNodes.links = secondChild;
	childrenNodes.popular = firstChild;


	let navigation = document.getElementById('navigation');
	navigation.lastElementChild.addEventListener('click',(event)=>{
		let target = event.target;
		if(target.tagName === 'BUTTON')
		{
			let key = target.dataset.link;
			container.innerHTML = '';
			container.appendChild(childrenNodes[key]);
		}
	});
}