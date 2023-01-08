@extends('backend.layouts.master')
    @section('title', 'category')
    @section('content')
        <div class="container-fluid">
            <div class="card card-block">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="m-b-1">Basic example</h5>
                        <table class="table m-md-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div id="root">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="categories">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
     {{-- script --}}
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script src='https://unpkg.com/babel-standalone@6.26.0/babel.js'></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script type="text/babel">
        const URL='https://jsonplaceholder.typicode.com/posts';
        axios.get(URL).then((res)=>{
            console.log(res);
        });
        const ReactAppFromCDN = ()=>{
        return (
            <div>My React App with CDN</div>
        )
        }
        
        // ReactDOM.render(<ReactAppFromCDN />, document.querySelector('#root'));

        class Clock extends React.Component {
                constructor(props) {
                    super(props);
                    this.state = {date: new Date()};
                }

                componentDidMount() {
                    this.timerID = setInterval(
                    () => this.tick(),
                    1000
                    );
                }

                // componentWillUnmount() {
                //     clearInterval(this.timerID);
                // }

                tick() {
                    this.setState({
                    date: new Date()
                    });
                }

                render() {
                    return (
                    <div>
                        <h1>Hello, world!</h1>
                        <h2>It is {this.state.date.toLocaleTimeString()}.</h2>
                    </div>
                    );
                }
        }

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<Clock />);




class Category extends React.Component{

   
    constructor(props){
        super(props);
        this.state={
            categories:[],
            message:'',
        }
    }
    
    componentDidMount(){
        axios.get('/categories')
        .then((res)=>{
            this.setState({
                message : res.data.message,
                categories : res.data.data
            });
        })
        .catch((e)=>{
            console.log(e);
        });
    }
    render() {
        function CategoryList({Categories}){
        return (
            <table class="table m-md-b-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Parent Name</th>
                       
                    </tr>
                </thead>
                <tbody>
                    {Categories.map((item) => {
                       return <CategoryItem key={item.id} cItem={item}/>
                    })}
                    
                </tbody>
            </table>
            
        )
    }

    function CategoryItem({cItem})
    {
        return(
            <tr>
                    <th scope="row">#</th>
                    <td>{cItem.name}</td>
                    <td>{cItem.parent_id}</td>
                   
            </tr>
        )
    }
        return (
                // <div>
                //     <h1>Hello, Categories!</h1>
                //     <h2>{this.state.message}</h2>
                // </div>
                <CategoryList Categories={this.state.categories}/>
                );
            }

}
const categories = ReactDOM.createRoot(document.getElementById('categories'));
categories.render(<Category/>);

    </script>
    @endsection