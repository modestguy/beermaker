import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import * as Styles from './Temperature.css';
import Config from '../../config.json';

class Temperature extends Component {
    constructor() {
        super();
        this.state = { value: 0 };
        this._increase();
    }

    _increase() {
        fetch(Config.host + '/api/temperature')
            .then(response => response.json())
            .then(result => {
                if (result.temperature !== -1)
                    this.setState({value: result.temperature })
            });
        setTimeout(this._increase.bind(this), 1000);
    }

    render () {
        return (
            <div id='temperature'>
                Текущая температура:
                <div className={Styles.temperature}>
                    {this.state.value} &#8451;
                </div>
            </div>
        )
    }
}

if (document.getElementById('currentTemperature')) {
    ReactDOM.render(<Temperature />, document.getElementById('currentTemperature'));
}

export default Temperature;
