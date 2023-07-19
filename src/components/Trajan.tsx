import { Component } from "react";

type stateTrajan = {
    message: String
}

export class Trajan extends Component {
    state:stateTrajan = {
        message: "No Value"
    }

    rerender() {
        const e = document.getElementById("hi") as HTMLInputElement
        this.setState({
            message: e?.value
        })
    }
    
    render() {
        return (
            <div>
                <input id='hi' />
                <p>{ this.state.message }</p>
                <button onClick={() => this.rerender()}>Encrypt</button>
                <button onClick={() => this.rerender()}>Decrypt</button>
                <p>Dies ist derzeit noch nicht funktional da dies noch fertig programmiert werden muss.<br />Gibt derzeit nur den Inhalt des Input-Feldes wieder.</p>
            </div>
        )
    }
}