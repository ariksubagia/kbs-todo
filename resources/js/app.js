import './bootstrap';

(function(){
    window.onload = onReady
    window.onrejectionhandled = onError

    function onReady(){
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf"]').getAttribute('content')

        //events
        // document.querySelector('#frmTodo').addEventListener('submit', submissionTodo)
        document.querySelectorAll('.chk-set-complete').forEach(x => x.addEventListener('change', setCompleteTodo))
        document.querySelectorAll('.delete-todo').forEach(x => x.addEventListener('click', deleteTodo))
    }

    function onError( e ){
        console.log('rejection >>> ', e)
    }

    async function submissionTodo( e ){
        e.preventDefault()

        try{
            const result = await axios.post("/todo", {
                title: this.title.value,
                description: this.description.value
            })
    
            addCard({ ...result.data.data })
        }catch( e ){
            if(e.status === 422){
                return
            }

            throw e
        }
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

    function addCard({ id, title, description, is_completed }){
        const cardHtml = `
        <div class="card p-3">
            <div class="flex flex-row items-start gap-3">
                <div>
                    <input type="checkbox" class="chk-set-complete rounded" data-id="${id}" ${( is_completed ? 'checked' : '' )} />
                </div>
                <div class="flex-1 flex-shrink-0">
                    <div class="font-bold text-gray-700 text-sm">${title}</div>
                    <div>${description}</div>
                </div>
                <div class="flex-shrink-0">
                    <button class="delete-todo btn btn-accent" data-id="${id}">Delete</button>
                </div>
            </div>
        </div>
        `

        document.querySelector('.card-list').appendChild(createElementFromString(cardHtml))
    }

    function applyFieldErrors( errors ){
        for( let errField in errors ){
            const frmGroupEl = document.queryString('.form-group input[name="errField"]').closest('.form-group')
            const errDoms = frmGroupEl.querySelectorAll('.err')

            if(errDoms.length > 0){
                errDoms.forEach(x => x.remove())
            }

            if(errors[errField].length <= 0) continue


        }
    }

    function createElementFromString( str ){
        const el = document.createElement('template')
        el.innerHTML = str
        return el.content
    }
})()