let base64 = (file)=> new Promise((resolve,reject)=> {
    let reader = new FileReader();
    reader.readAsDataURL(file)
    reader.onload = ()=> resolve(reader.result)
    reader.onerror = ()=> reject(false)
})


async function getfile() {
    const data = await base64(event.target.files[0])
    document.getElementById("data").setAttribute("value",data.split(";base64,").pop())
    document.getElementById('image').src = data
    return;
}