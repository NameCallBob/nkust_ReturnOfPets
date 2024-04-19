import Page from "./PageContent/Page.js"
import request from "./request.js"


    window.onload = function(){
        const page = new Page()
        document.getElementById('root').innerHTML = page.signup()
        document.getElementById('signupbtn').onclick = () => {
            let account = document.getElementById('account').value
            let password = document.getElementById('password').value
            let email = document.getElementById('email').value
            let phone = document.getElementById('phone').value
            let name = document.getElementById('name').value
            let birth = document.getElementById('birth').value
            let address = document.getElementById('address').value
            let params = {
                account:account,
                password:password,
                email:email,
                phone:phone,
                name:name,
                birth:birth,
                address:address,
                role:'member'
            }
            request().post("index.php?action=newMember",Qs.stringify(params))
            .then((res) => {
                let response = res['data'];
                if (response['status'] == 200){
                    alert('註冊成功')
                    location.href = 'login.html'
                }
                else{
                    alert('註冊失敗')
                    location.reload()
                } 
            })
            .catch((error => {
                console.log(error)
            }))
            
            
            
    }
    }
    

