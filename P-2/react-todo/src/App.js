import React, {useState} from 'react'
import 'bootstrap/dist/css/bootstrap.min.css'
import './App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome';
import { faCircleCheck, faTrashCan } from '@fortawesome/free-solid-svg-icons'

function App() {

  const [todo, setTodo] = useState([
     {"id": 1, "title": "Task 1", "status" : false},
     {"id": 2, "title": "Task 2", "status" : false}
  ])

  const [newTask, setNewTask] = useState('')

  const addTask = () => {
    if(newTask) { 
      let bil = todo.length + 1
      let newData = {id : bil, title: newTask, status: false}
      setTodo([...todo, newData])
      setNewTask('')
    }
  }
  
  const deleteTask = (idTodo) => {
    let newTask = todo.filter( task => task.id !== idTodo)
    setTodo(newTask)
  }

  const savingAsDone = (idTodo) => {
    let newTask = todo.map( task => {
      if(task.id === idTodo) {
        return ({...task, status: !task.status})
      }
      return task
    })
    setTodo(newTask)
  }

  return (
    
    <div className="container App justify-content-center">
      <h2 className='mt-4 text-start title mb-5 pt-5 text-white'>To do List</h2>    

        {/* new task */}
        <div className='row mb-3'>
          <div className='col'>
            <input value={newTask} onChange={ (e) => setNewTask(e.target.value)} className='form-control font-control-lg'/>
          
          </div>
          <div className='col'>
            <button onClick={addTask} className='btn btn-lg new-task-btn text-white'>
              New Task
            </button>
          </div>
        </div>

        {todo && todo.length ? '' : 'Nothing to do here'}    

        { todo && todo
        .sort((a,b) => a.id > b.id ? 1 : -1)
        .map((task, index) => {
          return(
          
          <React.Fragment key={task.id}>

            <div className='col-8 kotak rounded-3 mb-4 p-2'>
              <div className={task.status ? 'done' : ''}>

                <span className='todo-teks nomor text-white text-start me-3 ms-3'>{index + 1}</span>
                <span className='todo-teks text-white'>{task.title}</span>
              </div>
              <div className='icon-todo ms-3 pt-2'>
                <span onClick={(e) => savingAsDone(task.id)} className='me-3'>
                  <FontAwesomeIcon icon={faCircleCheck}/>
                </span>
                
                <span onClick={() => deleteTask(task.id)} >
                  <FontAwesomeIcon icon={faTrashCan}/>
                </span>
              </div>
            </div>

          </React.Fragment>)

        })

        }

    </div>

    
     
  );
}

export default App;
