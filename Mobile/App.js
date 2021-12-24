import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import Login from "./components/LoginPage";
import ProfilePage from "./components/ProfilePage";
import Signup from "./components/SignupPage";

const Stack = createNativeStackNavigator();

export default class App extends React.Component {
    render() {
        return (
            <NavigationContainer>
                <Stack.Navigator>
                    <Stack.Screen name="Login" component={Login} />
                    <Stack.Screen name="Signup" component={Signup} />
                    <Stack.Screen name="Profile" component={ProfilePage} />
                </Stack.Navigator>
            </NavigationContainer>
        );
    }
}
