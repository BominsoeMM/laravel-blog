import './bootstrap';
import '../sass/app.scss'
import * as bootstrap from 'bootstrap'
import '/node_modules/bootstrap-icons/font/bootstrap-icons.scss';
// import Swal from "sweetalert2";
import Swal from 'sweetalert2/dist/sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';

window.showToast = function (message){
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: message
    })
}
