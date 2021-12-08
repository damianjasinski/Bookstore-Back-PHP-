import React, { Component } from 'react';
import "./styles/foundation.min.css";
import "./styles/custom.css";
import { PostData } from "./services/PostData";
import Header from "./components/Header/Header";
import Footer from "./components/Footer/Footer";
import Reroute from "./routes"

function App() {
  return (
    <div className="off-canvas-wrapper">
      <div className="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div className="off-canvas-content" data-off-canvas-content>
          <div className="title-bar hide-for-large">
            <div className="title-bar-left">
              <button
                className="menu-icon"
                type="button"
                data-open="my-info"
              ></button>
              <span className="title-bar-title">Mike Mikerson</span>
            </div>
          </div>
          <Header />
          <Reroute/>
          <hr/>
          <Footer />
        </div>
      </div>
    </div>
  );
}

export default App;
