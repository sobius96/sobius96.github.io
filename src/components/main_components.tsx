import { Trajan } from './Trajan'
import { Blog } from "./Blog"

type props_state = {
    now:number
    change:Function
}

export const Header = (props:props_state) => {
    const dict: {[key:number]: string} = {0: "- Trajan", 1: "- Blog", 2: ""}
    return (
        <header>
            <h1>Sobius {dict[props.now]}</h1>
            <div>
                <a onClick={() => props.change(0)}> Trajan</a> |
                <a onClick={() => props.change(1)}> Blog</a> |
                <a onClick={() => props.change(2)}> Home</a> 
            </div>
        </header>
    )
}

export const Footer = () => {
    return (
        <footer>
            Diese Website ist nicht annähernd fertig
        </footer>
    )
}

export const ContentManager = (props:props_state) => {
    if (props.now === 0) {
        return (
            <div>
                <Trajan />
            </div>
        )
    } else if (props.now === 1) {
        return (
            <div>
                <Blog date="16.07.2023-16:09">
                    Hello World
                </Blog>
                <Blog date="19.07.2023-22:11">
                    Heute ist wohl einer der größten Fortschritte passiert, seitdem ich angefangen habe, React zu lernen. 
                    Ich habe denke ich mal Hooks verstanden und auch erfolgreich eingesetzt. 
                    Dadurch habe ich endlich mein Ziel erreich, eine Navigation über den Header zu ermöglichen, sich aber der Inhalt der Website im Bauch dennoch ändert, ohne eine neue HTML Datei aufrufen zu müssen. 
                    Ich finde tatsächlich diese Lösungen mit einer HTML Datei durch React/JS wesentlich besser, als die Wege die ich vorher genutzt habe (weil ich es nicht anders gelernt habe).
                </Blog>
            </div>
        )
    } else {
        return (
            <div>
                Nothing here
            </div>
        )
    }
}