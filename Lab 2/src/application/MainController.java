package application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;

public class MainController {
	
	@FXML
	private Label display;
	private String output = "";
	
	@FXML
	public void processNum (ActionEvent event) {
		String value = ((Button)event.getSource()).getText();
		display.setText(display.getText() + value);
	}
	
	@FXML
	public void processOperators (ActionEvent event) {
		
	}
	
	@FXML
	public void processDecimal (ActionEvent event) {
	
	}
	
	@FXML
	public void processEqual (ActionEvent event) {
		
	}
	
	

}
