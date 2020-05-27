import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

import HomePage from "../../pages/HomePage";
import RegularPage from "../../pages/RegularPage";
import Layout from "../Layout/Layout";

const Application = () => {
  return (
    <Router>
      <Layout>
        <Switch>
          <Route exact path="/" component={HomePage} />
          <Route path="/:slug" component={RegularPage} />
        </Switch>
      </Layout>
    </Router>
  );
};

export default Application;
