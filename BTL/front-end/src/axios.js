import axios from 'axios'

var JAxios = axios.create({ // Không có dấu '/' ở cuối
 // baseURL: 'http://musicleaker.unaux.com/api',
  baseURL: 'http://localhost/musicleaker/back-end/api', // <---------------------------
  timeout: 120000,
  headers: {
    Accept: "*/*",
    contentType: 'application/json'
  }
})


export default JAxios
