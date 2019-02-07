window.onload = ()=>
{
	secondCol.addEventListener('mousedown',function(event){
		var target = event.target;
		console.log(target.tagName);
		if(target.tagName === 'BUTTON')
		{
			let selector = target.parentNode.parentNode.querySelector('select');
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
}