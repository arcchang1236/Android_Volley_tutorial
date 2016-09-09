package com.example.arcchang.androidphp;

import java.util.HashMap;
import java.util.Map;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

public class MainActivity extends Activity {
    private final String TAG = "MainActivity";
    String url = "http://52.198.30.224/insert_man.php";
    String item_emid;
    String item_tagid;
    String item_name;

    EditText et_emid;
    EditText et_tagid;
    EditText et_name;
    ProgressDialog PD;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        PD = new ProgressDialog(this);
        PD.setMessage("Loading.....");
        PD.setCancelable(false);

        et_emid = (EditText) findViewById(R.id.item_et_emid);
        et_tagid = (EditText) findViewById(R.id.item_et_tagid);
        et_name = (EditText) findViewById(R.id.item_et_name);
    }

    public void insert(View v) {
        PD.show();
        item_emid = et_emid.getText().toString();
        item_tagid = et_tagid.getText().toString();
        item_name = et_name.getText().toString();

        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        PD.dismiss();
                        et_emid.setText("");
                        et_tagid.setText("");
                        et_name.setText("");
                        Toast.makeText(getApplicationContext(),
                                "Data Inserted Successfully",
                                Toast.LENGTH_SHORT).show();

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                PD.dismiss();
                Toast.makeText(getApplicationContext(),
                        "failed to insert", Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<String, String>();
                Log.v(TAG, item_emid + " === " + item_tagid + " === " + item_name);
                params.put("item_emid", item_emid);
                params.put("item_tagid", item_tagid);
                params.put("item_name", item_name);

                return params;
            }
        };

        // Adding request to request queue
        MyApplication.getInstance().addToReqQueue(postRequest);
    }

    public void read(View v) {
        Intent read_intent = new Intent(MainActivity.this, ReadData.class);
        startActivity(read_intent);
    }

}
