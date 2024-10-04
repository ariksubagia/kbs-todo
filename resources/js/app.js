import './bootstrap';

(function(){
    window.onload = onReady
    window.onrejectionhandled = onError

    function onReady(){
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf"]').getAttribute('content')

        //events
        document.querySelectorAll('.chk-set-complete').forEach(x => x.addEventListener('change', setCompleteTodo))
        document.querySelectorAll('.delete-todo').forEach(x => x.addEventListener('click', deleteTodo))
    }

    function onError( e ){
        console.log('rejection >>> ', e)
    }

    async function deleteTodo( e ){
        e.preventDefault()

        if( !confirm("Apa anda yakin ingin menghapus data ini?") ){
            return
        }

        const todoId = e.target.getAttribute('data-id')
        await axios.delete(`/todo/${todoId}`)

        e.target.closest('.card').remove()
    }

    async function setCompleteTodo( e ){
        e.preventDefault()

        const status = e.target.checked
        const todoId = e.target.getAttribute('data-id')

        await axios.put(`/todo/${todoId}/status`, {
            status
        })
    }
})()