package com.example.arvind.firstapptask;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    private TextView counterText;//a text field to display the countervalue.
    private Button button, resetButton;//button is used to increase the counter value.resetButton is used to reset the counter.
    private int x = 0;//x is the counter value.
    private String word;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        counterText = (TextView) findViewById(R.id.text);
        button = (Button) findViewById(R.id.button);
        resetButton = (Button) findViewById(R.id.resetbutton);
        button.setOnClickListener(new View.OnClickListener() {//this onclick listener is for increasing the counter value.
            @Override
            public void onClick(View v) {
                counterText.setText(Integer.toString(++x));
            }
        });

        resetButton.setOnClickListener(new View.OnClickListener() {//this onclick listener is for resetting the counter value to 0.
            @Override
            public void onClick(View v) {
                x = 0;
                counterText.setText(Integer.toString(x));

            }
        });
    }
    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        outState.putInt("counter", x);
        word=counterText.getText().toString();
        outState.putString("text",word);

    }

    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
        x=savedInstanceState.getInt("counter");
        word=savedInstanceState.getString("text");
        counterText.setText(word);
    }

}