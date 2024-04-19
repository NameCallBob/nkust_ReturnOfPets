import Page from "../PageContent/Page.js";
import request from "../request.js";
window.onload = function () {
    let page = new Page();
    document.getElementById('root').innerHTML = page.comcenter()
    let data = {
        'role':'company',
        'account':window.localStorage.getItem('reac')
    }

    request().post('index.php?action=getCompany',Qs.stringify(data))
    .then((res)=>{  

        let response = res['data'];
        if (response['status'] == 200){
            response['result'].forEach(element => {
                document.getElementById('comname').value = element['name'];
                document.getElementById('comid').value = element['comid'];
                document.getElementById('area').value = element['area'];
                document.getElementById('address').value = element['address'];
                document.getElementById('email').value = element['email'];
                document.getElementById('number').value = element['phone']
                document.getElementById('account').value = element['account'];
                document.getElementById('password').value = element['password'];
            });
            document.getElementById('submit').onclick = function () {
                chge()
            }
            
        }

    })
    .catch((err)=>{
        alert('Error happened');
        console.log(err);
    })  


    function chge() {
        let data = {
            name:document.getElementById('comname').value,
            comid: document.getElementById('comid').value,
            area:document.getElementById('area').value,
            address:document.getElementById('address').value,
            email:document.getElementById('email').value,
            phone:document.getElementById('number').value,
            account:document.getElementById('account').value,
            password:document.getElementById('password').value,
            role:'company'
        }
        request().post('index.php?action=updateCompany',Qs.stringify(data))
        .then((res)=>{
            let response = res['data'];
            if (response['status'] == 200){
                alert('修改成功')
                location.reload()
            }
            else if (response['status'] == 403) {
                alert('請重新登入');
                location.href = 'select_role.html'
            }
            else{
                alert('修改出現錯誤');
                // location.reload()
            }
        })
        .catch ((err)=>{
            console.log(err)
        })
    }
}