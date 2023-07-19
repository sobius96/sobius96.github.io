import './App.css';
import { useState } from 'react';
import { Header, Footer, ContentManager } from './components/main_components';

const App = () => {
  const [current, setCurrent] = useState(0)

  return (
    <div className="App">
      <Header now={current} change={(e:number) => setCurrent(e)} />
      <ContentManager now={current} change={(e:number) => setCurrent(e)} />
      <Footer />
    </div>
  );
}

export default App;
