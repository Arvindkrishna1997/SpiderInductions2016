package com.example.arvind.firstapptask;

import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    private TextView counterText;
    private Button button, resetButton;
    private int x = 0, colorId = 0, flag = 0;//x is the counter value.
    private ColorDrawable viewColor;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        onPro();
    }

    public void onPro() {

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
}